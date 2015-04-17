package br.edu.fjn.ir.model;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.SequenceGenerator;

import br.edu.fjn.ir.model.Table;

@Entity
public class Salary {

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "salary_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "salary_seq", sequenceName = "salary_seq")
	private Integer id;
	private String date;
	private String value;
	@OneToOne(fetch = FetchType.EAGER)
	@JoinColumn(name = "idTable", nullable = false)
	private Table table;

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

	public String getValue() {
		return value;
	}

	public void setValue(String value) {
		this.value = value;
	}

	public Table getTable() {
		return table;
	}

	public void setTable(Table table) {
		this.table = table;
	}

}
