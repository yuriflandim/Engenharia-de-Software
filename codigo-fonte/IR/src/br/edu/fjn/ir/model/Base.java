package br.edu.fjn.ir.model;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.SequenceGenerator;

@Entity
public class Base {

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "base_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "base_seq", sequenceName = "base_seq")
	private Integer id;
	private String firstValue;
	private String lastValue;
	private String aliquot;
	private String portionDeduce;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getFirstValue() {
		return firstValue;
	}

	public void setFirstValue(String firstValue) {
		this.firstValue = firstValue;
	}

	public String getLastValue() {
		return lastValue;
	}

	public void setLastValue(String lastValue) {
		this.lastValue = lastValue;
	}

	public String getAliquot() {
		return aliquot;
	}

	public void setAliquot(String aliquot) {
		this.aliquot = aliquot;
	}

	public String getPortionDeduce() {
		return portionDeduce;
	}

	public void setPortionDeduce(String portionDeduce) {
		this.portionDeduce = portionDeduce;
	}

}
