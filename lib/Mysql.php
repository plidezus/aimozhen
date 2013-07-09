<?php

class Mysql {
	protected static $client = null;
	protected static $class_name = null;

	public $id = null;

	/**
	 *
	 * @return mysqli
	 */
	public static function client() {
		if (!isset(self::$client)) {
			$config = Config::get('env.mysql');
			self::$client = new mysqli($config['host'], $config['user'], $config['password']);
			self::$client->select_db('aimozhen');
			self::$client->query('SET NAMES UTF8');
		}
		return self::$client;
	}
	
	public function __construct($id = null) {
		if ($id) {
			$this->load($id);
		}
	}
	
	public function load($id) {
		$class_name = static::$class_name ?: get_called_class();
		$id = self::client()->real_escape_string($id);
		$result = $this->client()->query("select * from {$class_name} where `id` = '$id' limit 1");
		
		if ($result->num_rows) {
			$data = $result->fetch_assoc();
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		}
		return $this;
	}
	
	public static function loads($ids) {
		if (empty($ids)) {
			return array();
		}
		$class_name = static::$class_name ?: get_called_class();
		$ids_str = self::client()->real_escape_string(join(',', $ids));
		$result = self::client()->query("select * from {$class_name} where `id` IN ({$ids_str}) ORDER BY `createdTime` desc");
		$ret = array();
		if ($result->num_rows) {
			while ($data = $result->fetch_object($class_name)) {
				$ret[$data->id] = $data;
			}
		}
		return $ret;
	}
	
	private function getQuery() {
		$where = array('1=1');
		
		foreach ($this->columns() as $key) {
			if (isset($this->{$key})) {
				$where[] = "`{$key}` = " . $this->encode($key);
			}
		}
		
		$where_str = join(' AND ', $where);
		return $where_str;
	}
	
	public function count($option = array()) {
		$table_name = static::$class_name ?: get_called_class();

		$where_str = $this->getQuery();
		
		if (isset($option['multiuser'])) {
			$where_str = "`userid` IN (" . $option['multiuser'] . ")";
		}

		$sql = "SELECT COUNT(1) FROM {$table_name} WHERE {$where_str}";
		
		$result = self::client()->query($sql);
		return current($result->fetch_row());
	}
	
	public function delete($option = array()) {
		$table_name = static::$class_name ?: get_called_class();
		$id_str = $this->id;
		if (isset($option['id'])) {
			$id_str = $option['id'];
		}

		$sql = "delete from `{$table_name}` where id='{$id_str}'";;
		
		$result = self::client()->query($sql);
		return $result;
	}
	
	public function find($option = array()) {
		$table_name = static::$class_name ?: get_called_class();

		$where_str = $this->getQuery();
		
		$option_str = '';

		if (isset($option['multiuser'])) {
			$where_str = "`userid` IN (" . $option['multiuser'] . ")";
		}
		if (isset($option['search'])) {
			$option_str .= "`title` LIKE '%".trim($option['search'])."%'";
		}
		if (isset($option['order'])) {
			$option_str .= 'ORDER BY ' . $option['order'];
		}
		if (!isset($option['limit'])) {
			$option['limit'] = 40;
		}
		$option_str .= ' LIMIT ' . $option['limit'];
		
		$sql = "SELECT * FROM {$table_name} WHERE {$where_str} {$option_str}";
		$result = self::client()->query($sql);
		$ret = array();
		if ($result->num_rows) {
			while ($data = $result->fetch_object($table_name)) {
				$ret[$data->id] = $data;
			}
		}
		return $ret;
	}
	
	public function save() {
		if ($this->id) {
			return $this->update();
		} else {
			return $this->insert();
		}
	}
	
	protected function update() {
		$table_name = static::$class_name ?: get_called_class();
		$col = $this->columns();
		$set_strs = array();
		foreach ($col as $each_col) {
			$set_strs []= "`{$each_col}` = " . $this->encode($each_col);
		}
		$set_str = join(', ', $set_strs);
		$sql = "UPDATE {$table_name} SET $set_str WHERE `id` = {$this->id}";
		$this->client()->query($sql);
		return $this;
	}
	
	protected function insert() {
		$table_name = static::$class_name ?: get_called_class();
		$col = $this->columns();
		$col_str = join(',', array_map(function($v) {return "`$v`";}, $col));
		$values_str = join(',', array_map(
			array($this, 'encode'), $col
		));
		$sql = "INSERT INTO {$table_name} ({$col_str}) VALUES ({$values_str})";
		$this->client()->query($sql);
		if ($this->client()->errno) {
			return ;
		}
		else
			return $this->id = $this->client()->insert_id;
	}

	protected function columns() {
		$vars = get_class_vars(get_called_class());
		unset($vars['client'], $vars['class_name']);
		return array_keys($vars);
	}

	protected function encode($v) {
		return "'" . $this->client()->real_escape_string($this->{$v}) . "'";
	}

	public static function loader() {
		return new static();
	}
}
?>