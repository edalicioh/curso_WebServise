<?php
class Curso
{

	private $conexao;
	private $id;
	private $nome;
	private $descricao;


	public function __construct($conexao)
	{
		$this->conexao = $conexao;
	}

	public function __get($name)
	{
		return $this->$name;
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}



	public function findById($id)
	{
		$sql = 'select * from  curso';
		$sql .= ' where id = :id';
		$sql .= ' order by nome';

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindParam(':id', $id);

		try {
			$stmt->execute();
			$Disciplina = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $Disciplina;
		} catch (PDOException $e) {
			throw $e;
		}
	}

	public function findAll()
	{
		$sql = 'select * from curso';
		$stmt = $this->conexao->prepare($sql);
		try {
			$stmt->execute();
			$disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $disciplinas;
		} catch (PDOException $e) {
			throw $e;
		}
	}

	//insert  disciplina na BD//
	public function insert()
	{

		$sql = "insert into curso";
		$sql .= " (nome,descricao)";
		$sql .= " values (:nome,:descricao)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':descricao', $this->descricao);



		try {
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			throw $e;
		}
	}

	// update disciplina//
	public function update($id)
	{
		$sql = "update curso";
		$sql .= " set nome=:nome,descricao=:descricao";
		$sql .= " where id=:id";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(":descricao", $this->descricao);

		try {
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			throw $e;
		}
	}
	//delete Disciplina//
	public function delete($id)
	{
		$sql = "delete from curso where id=:id";
		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':id', $id);


		try {
			$stmt->execute();
			return true;
		} catch (PDOException $e) {
			throw $e;
		}
	}
}
