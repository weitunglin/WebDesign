package database

import (
	"database/sql"
	"log"
)

var Db *sql.DB

func initDb() {
	Db, err := sql.Open("mysql", "root:0000@tcp(127.0.0.1:3306)/weitung?parseTime=true")
	if err != nil {
		log.Fatal(err.Error())
	}
	err = Db.Ping()
	if err != nil {
		log.Fatal(err.Error())
	}
	return
}
