package br.edu.fjn.ir.model;

import java.util.List;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToMany;
import javax.persistence.OneToMany;
import javax.persistence.OneToOne;
import javax.persistence.PrimaryKeyJoinColumn;
import javax.persistence.SequenceGenerator;

import org.hibernate.annotations.IndexColumn;

@Entity
public class Client{

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY, generator = "client_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "client_seq", sequenceName = "client_seq")
	private Integer id;
	private String name;
	@Column(unique = true)
	private String email;
	private String CPF;
	private String RG;
	private String phone;
	@ManyToMany(fetch = FetchType.EAGER)
	@IndexColumn(name = "idDependent")
	private List<Dependent> dependent;
	@OneToMany(fetch = FetchType.EAGER)
	@IndexColumn(name = "idSalary")
	private List<Salary> salary;
	@OneToOne(fetch = FetchType.EAGER)
	@JoinColumn(name = "idBookBox")
	private BookBox bookBox;

	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getCPF() {
		return CPF;
	}

	public void setCPF(String cPF) {
		CPF = cPF;
	}

	public String getRG() {
		return RG;
	}

	public void setRG(String rG) {
		RG = rG;
	}

	public String getPhone() {
		return phone;
	}

	public void setPhone(String phone) {
		this.phone = phone;
	}

	public List<Dependent> getDependent() {
		return dependent;
	}

	public void setDependent(List<Dependent> dependent) {
		this.dependent = dependent;
	}

	public List<Salary> getSalary() {
		return salary;
	}

	public void setSalary(List<Salary> salary) {
		this.salary = salary;
	}

	public BookBox getBookBox() {
		return bookBox;
	}

	public void setBookBox(BookBox bookBox) {
		this.bookBox = bookBox;
	}

}
