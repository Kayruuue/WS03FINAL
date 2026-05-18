<?php

class Database
{
	public $conn;

	/**
	 * Database constructor.
	 *
	 * @param array $config
	 */
	public function __construct($config)
	{
		$dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']}";
		$username = $config['username'] ?? '';
		$password = $config['password'] ?? '';

		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];

		try {
			$this->conn = new PDO($dsn, $username, $password, $options);
		} catch (PDOException $e) {
			throw new Exception("Database connection failed: " . $e->getMessage());
		}
	}

	/**
	 * Execute a SQL query and return the results.
	 *
	 * @param string $query
	 * @return PDOStatement
	 * @throws Exception
	 */
	public function query($query, $params = [])
	{
		try {
			$sth = $this->conn->prepare($query);
			foreach ($params as $param => $value) {
				$sth->bindValue(':' . $param, $value);
			}
			$sth->execute();
			return $sth;
		} catch (PDOException $e) {
			throw new Exception("Query failed: " . $e->getMessage());
		}
	}
}
