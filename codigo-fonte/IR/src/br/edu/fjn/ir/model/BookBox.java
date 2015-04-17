package br.edu.fjn.ir.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;

@Entity
public class BookBox {

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "bookBox_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "bookBox_seq", sequenceName = "bookBox_seq")
	private Integer id;
	private String value;
	private String date;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getValue() {
		return value;
	}

	public void setValue(String value) {
		this.value = value;
	}

	public String getDate() {
		return date;
	}

	public void setDate(String date) {
		this.date = date;
	}

}
