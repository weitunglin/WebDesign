package main

import (
	db "./database"
)

func main() {
	defer db.Db.Close()

	router := initRouter()
	router.Run(":8000")
}
