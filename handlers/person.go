package handlers

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

func index(c *gin.Context) {
	c.JSON(http.StatusOK, gin.H{
		"status":  http.StatusOK,
		"message": "here is the homepage of the api",
	})
}

func addperson(c *gin.Context) {

}

func getpeople(c *gin.Context) {

}

func getperson(c *gin.Context) {

}

func modperson(c *gin.Context) {

}

func delperson(c *gin.Context) {

}
