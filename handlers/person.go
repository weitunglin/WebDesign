package handlers

import (
	"fmt"
	"log"
	"net/http"
	"strconv"

	"github.com/gin-gonic/gin"
	db "github.com/weitung/api/database"
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
	var err error
	firstname := c.Request.FormValue("firstname")
	lastname := c.Request.FormValue("lastname")
	age, err := strconv.Atoi(c.Request.FormValue("age"))
	checkerr(err, "form value convertion")

	rs, err := db.Db.Query("insert into people(idnumber, firstname, lastname, age) values(null, ?, ?, ?)", firstname, lastname, age)
	log.Printf("error : %s", err)
	defer rs.Close()
	// id, err := rs.LastInsertId()
	checkerr(err, "sql insert id")

	c.JSON(http.StatusOK, gin.H{
		"status":     http.StatusOK,
		"resourceid": 1,
	})
	return
}

//Getpeople R handler
func Getpeople(c *gin.Context) {

}

//Getperson R handler
func Getperson(c *gin.Context) {

}

//Modperson U handler
func Modperson(c *gin.Context) {

}

//Delperson D handler
func Delperson(c *gin.Context) {

}

func checkerr(err error, msg string) {
	if err != nil {
		log.Println("Error : %s error\n", msg)
		fmt.Println("Error : %s error\n", msg)
	}
	return
}
