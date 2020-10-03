<?php


class Disciplina
{
	private $conexao;
	private $id;
	private $codigo;
	private $nome;
	private $carga;
	private $ementa;
	private $semestre;
	private $idCurso;

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



	public function readSemestre($semestre)
	{
		$sql = 'select * from  discipina';
		$sql .= ' where semestre = :semestre';
		$sql .= ' order by semestre, nome';

		$stmt = $this->conexao->prepare($sql);

		$stmt->bindParam(':semestre', $semestre);

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
		$sql = 'select * from discipina';
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

		$sql = "insert into discipina";
		$sql .= " (nome,codigo,carga,ementa,semestre,id_curso)";
		$sql .= " values (:nome,:codigo,:carga,:ementa,:semestre,:id_curso)";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':codigo', $this->codigo);
		$stmt->bindValue(':carga', $this->carga);
		$stmt->bindValue(':ementa', $this->ementa);
		$stmt->bindValue(':semestre', $this->semestre);
		$stmt->bindValue(':id_curso', $this->idCurso);



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
		$sql = "update discipina";
		$sql .= " set nome=:nome,codigo=:codigo,carga=:carga,";
		$sql .= " ementa=:ementa,semestre=:semestre,id_curso=:id_curso ";
		$sql .= " where id=:id";

		$stmt = $this->conexao->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(":codigo", $this->codigo);
		$stmt->bindValue(':carga', $this->carga);
		$stmt->bindValue(":ementa", $this->ementa);
		$stmt->bindValue(':semestre', $this->semestre);
		$stmt->bindValue(":id_curso", $this->idCurso);

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
		$sql = "delete from discipina where id=:id";
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
