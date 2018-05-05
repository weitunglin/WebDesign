package main

import (
	"database/sql"
	"encoding/json"
	"fmt"
	"log"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
	"github.com/gorilla/mux"
)

type user struct {
	ID     string `json:"Id"`
	Userid string `json:"Userid"`
	Acc    string `json:"Acc"`
	Pwd    string `json:"Pwd"`
	Name   string `json:"Name"`
	Perm   string `json:"Perm"`
}

var users []user

func checkerr(err error) {
	if err != nil {
		log.Fatal(err)
	}
}

func userinit() {
	db, err := sql.Open("mysql", "allen:allen2001@/web")
	defer db.Close()
	checkerr(err)
	res, err := db.Query("select *,LPAD(id,3,'0') as userid from user")
	checkerr(err)
	for res.Next() {
		var id string
		var userid string
		var acc string
		var pwd string
		var name string
		var perm string
		err := res.Scan(&id, &acc, &pwd, &name, &perm, &userid)
		checkerr(err)
		users = append(users, user{ID: id, Acc: acc, Pwd: pwd, Name: name, Perm: perm, Userid: userid})
	}
}

func homehandler(w http.ResponseWriter, r *http.Request) {

}

func getusers(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	json.NewEncoder(w).Encode(users)
	fmt.Printf("%v", users)
}

func getuser(w http.ResponseWriter, r *http.Request) {
	w.Header().Set("Content-Type", "application/json")
	// params := mux.Vars(r)

}

func createuser(w http.ResponseWriter, r *http.Request) {

}

func updateuser(w http.ResponseWriter, r *http.Request) {

}

func deleteuser(w http.ResponseWriter, r *http.Request) {

}

func main() {

	r := mux.NewRouter()

	userinit()

	r.HandleFunc("/", homehandler)
	r.HandleFunc("/user", getusers).Methods("GET")
	r.HandleFunc("/user/{id}", getuser).Methods("GET")
	r.HandleFunc("/user/", createuser).Methods("POST")
	r.HandleFunc("/user/{id}", updateuser).Methods("PUT")
	r.HandleFunc("/user/{id}", deleteuser).Methods("DELETE")

	log.Fatal(http.ListenAndServe(":8000", r))

}
