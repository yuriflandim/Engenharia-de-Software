	package br.edu.fjn.ir.model;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.SequenceGenerator;

@Entity
public class Operador {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY, generator = "dependente_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "dependente_seq", sequenceName = "dependente")
	private Integer id;
	private String name;
	@Column(unique=true)
	private String email;
	private String CPF;
	private String RG;
	private String phone;
	private String password;
	private String permission;
	private String recordDate;
//	@OneToOne(fetch = FetchType.EAGER)
//	@JoinColumn(name = "idBusiness", nullable = false)
//	private Business business;
	@OneToOne(cascade = CascadeType.ALL, fetch = FetchType.EAGER)
	@JoinColumn(name = "idAddress")
	private Address address;

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

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getPermission() {
		return permission;
	}

	public void setPermission(String permission) {
		this.permission = permission;
	}

	public String getRecordDate() {
		return recordDate;
	}

	public void setRecordDate(String recordDate) {
		this.recordDate = recordDate;
	}

//	public Business getBusiness() {
//		return business;
//	}
//
//	public void setBusiness(Business business) {
//		this.business = business;
//	}

	public Address getAddress() {
		return address;
	}

	public void setAddress(Address address) {
		this.address = address;
	}

}
