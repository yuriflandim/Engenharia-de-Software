package br.edu.fjn.ir.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;

@Entity
public class Table {
	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "table_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "table_seq", sequenceName = "table_seq")
	private Integer id;
	private String date;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getDate() {
		return date;
	}

	public void setDate(String date) {
		this.date = date;
	}

}
