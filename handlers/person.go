package handlers

import (
	"fmt"
	"log"
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	db "github.com/weitung/api/database"
	. "github.com/weitung/api/models"
)

//Index of the api
func Index(c *gin.Context) {
	c.JSON(http.StatusOK, gin.H{
		"status":  http.StatusOK,
		"message": "here is the homepage of the api\n",
	})
}

//Addperson C handler
func Addperson(c *gin.Context) {
	firstname := c.Request.FormValue("firstname")
	lastname := c.Request.FormValue("lastname")
	age, err := strconv.Atoi(c.Request.FormValue("age"))
	checkerr(err, "form value convertion")

	rs, err := db.Db.Exec("insert into people values(null, ?, ?, ?)", firstname, lastname, age)
	log.Printf("error : %s\n", err)

	id, err := rs.LastInsertId()
	checkerr(err, "sql insert id")

	c.JSON(http.StatusOK, gin.H{
		"status":     http.StatusOK,
		"resourceid": id,
	})

	return
}

//Getpeople R handler
func Getpeople(c *gin.Context) {
	rows, err := db.Db.Query("select * from people")
	checkerr(err, "sql query all")

	defer rows.Close()

	people := make([]Person, 0)

	for rows.Next() {
		var person Person
		rows.Scan(&person.Idnumber, &person.Firstname, &person.Lastname, &person.Age)
		people = append(people, person)
	}
	checkerr(rows.Err(), "sql query fetching")

	c.JSON(http.StatusOK, gin.H{
		"status":     http.StatusOK,
		"data":       people,
		"resourceid": "",
	})

}

//Getperson R handler
func Getperson(c *gin.Context) {
	var person Person
	id := c.Param("id")
	err := db.Db.QueryRow("select * from people where idnumber = ?", id).Scan(&person.Idnumber, &person.Firstname, &person.Lastname, &person.Age)
	checkerr(err, "sql query single")

	c.JSON(http.StatusOK, gin.H{
		"status":     http.StatusOK,
		"resourceid": id,
		"data":       person,
	})
}

//Modperson U handler
func Modperson(c *gin.Context) {
	var (
		person Person
		err    error
	)
	id := c.Param("id")

	person.Idnumber, err = strconv.Atoi(id)
	checkerr(err, "fetching id")

	err = c.ShouldBind(&person)
	checkerr(err, "binding data")

	stam, err := db.Db.Prepare("update people set firstname = ?, lastname = ?, age = ? where idnumber = ?")
	checkerr(err, "sql update preparation")

	rs, err := stam.Exec(person.Firstname, person.Lastname, person.Age, person.Idnumber)
	checkerr(err, "sql update execution")

	rid, err := rs.RowsAffected()
	checkerr(err, "fetch update id")

	c.JSON(http.StatusOK, gin.H{
		"Status":     http.StatusOK,
		"resourceid": rid,
	})
}

//Delperson D handler
func Delperson(c *gin.Context) {
	cid := c.Param("id")

	id, err := strconv.Atoi(cid)
	checkerr(err, "fetching id")

	stam, err := db.Db.Prepare("delete from people where idnumber = ?")
	checkerr(err, "sql delete preparation")

	rs, err := stam.Exec(id)
	checkerr(err, "sql delete execution")

	rid, err := rs.RowsAffected()
	checkerr(err, "fetch delete id")

	c.JSON(http.StatusOK, gin.H{
		"status":     http.StatusOK,
		"resourceid": rid,
	})

}

func checkerr(err error, msg string) {
	if err != nil {
		log.Printf("Error : %s error\n", msg)
		fmt.Printf("Error : %s error\n", msg)
	}
	return
}
