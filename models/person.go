package models

type person struct {
	Idnumber  int    `json:"idnumber"`
	Firstname string `json:"firstname"`
	Lastname  string `json:"lastname"`
	Age       int    `json:"age"`
}
