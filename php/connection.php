<?php
class MauiConnection
{
	public static function MauiConn()
	{
		/* $conn = mysqli_connect("maui-database.cv7x0hw15acc.us-east-2.rds.amazonaws.com", "devwebmaui", "Abcde.12345", "MAUI"); */
		$conn = mysqli_connect("localhost", "root", "", "maui");
		mysqli_set_charset($conn, "utf8");

		return $conn;
	}
}
