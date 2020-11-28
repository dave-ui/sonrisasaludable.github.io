<?php
class QuirurData
{
	public static $tablename = "quirurgicas";


	public function __construct()
	{
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";

		$this->date_at = "";
		$this->descripcion = "";
		$this->detall = "";
		$this->observaciones = "";
		$this->name = "";
		$this->lastname = "";



	}

	public function getPacient()
	{
		return PacientData::getById($this->pacient_id);
	}

	public function add()
	{
		$sql = "insert into quirurgicas (name,lastname,fecha,descrip,observ,detall) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->date_at\",\"$this->descripcion\",\"$this->observaciones\",\"$this->receta\", ,$this->created_at\")";
		return Executor::doit($sql);
	}

	public static function delById($id)
	{
		$sql = "delete from " . self::$tablename . " where id=$id";
		Executor::doit($sql);
	}
	public function del()
	{
		$sql = "delete from " . self::$tablename . " where id=$this->id";
		Executor::doit($sql);
	}

	// partiendo de que ya tenemos creado un objecto QuirurData previamente utilizamos el contexto
	public function update()
	{
		$sql = "update " . self::$tablename . " set no=\"$this->no\",title=\"$this->title\",pacient_id=\"$this->pacient_id\",medic_id=\"$this->medic_id\",date_at=\"$this->date_at\",time_at=\"$this->time_at\",note=\"$this->note\",sick=\"$this->sick\",symtoms=\"$this->symtoms\",medicaments=\"$this->medicaments\",status_id=\"$this->status_id\",payment_id=\"$this->payment_id\",price=\"$this->price\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id)
	{
		$sql = "select * from " . self::$tablename . " where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0], new QuirurData());
	}

	public static function getRepeated($pacient_id, $date_at)
	{
		$sql = "select * from " . self::$tablename . " where pacient_id=$pacient_id and date_at=\"$date_at\" and status_id=1";
		$query = Executor::doit($sql);
		return Model::one($query[0], new QuirurData());
	}



	public static function getByMail($mail)
	{
		$sql = "select * from " . self::$tablename . " where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0], new QuirurData());
	}

	public static function getEvery()
	{
		$sql = "select * from " . self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getPendings()
	{
		$sql = "select * from " . self::$tablename . " where status_id=1";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getPendings2()
	{
		$sql = "select * from " . self::$tablename . " where status_id=1 or status_id=2";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}


	public static function getEveryByPacientId($id)
	{
		$sql = "select * from " . self::$tablename . " where pacient_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getEveryByMedicId($id)
	{
		$sql = "select * from " . self::$tablename . " where medic_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getAll()
	{
		$sql = "select * from " . self::$tablename . " where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}


	public static function getAllPendings()
	{
		$sql = "select * from " . self::$tablename . " where date(date_at)>=date(NOW()) and status_id=1 and payment_id=1 order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}


	public static function getAllByPacientId($id)
	{
		$sql = "select * from " . self::$tablename . " where pacient_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getAllByMedicId($id)
	{
		$sql = "select * from " . self::$tablename . " where medic_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getAllByMedicIdS($id, $s)
	{
		$sql = "select * from " . self::$tablename . " where medic_id=$id and status_id=$s order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getBySQL($sql)
	{
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getOld()
	{
		$sql = "select * from " . self::$tablename . " where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getLike($q)
	{
		$sql = "select * from " . self::$tablename . " where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getGroupByDate($start, $end)
	{
		$sql = "select count(*) as s from " . self::$tablename . " where date_at >= \"$start\" and date_at <= \"$end\"";
		$query = Executor::doit($sql);
		return Model::many($query[0], new QuirurData());
	}

	public static function getByDT($d, $t)
	{
		$sql = "select * from " . self::$tablename . " where date_at=\"$d\" and time_at=\"$t\" ";
		$query = Executor::doit($sql);
		return Model::one($query[0], new QuirurData());
	}

	public static function getByMDT($m, $d, $t)
	{
		$sql = "select * from " . self::$tablename . " where medic_id=$m and date_at=\"$d\" and time_at=\"$t\" ";
		$query = Executor::doit($sql);
		return Model::one($query[0], new QuirurData());
	}
}
