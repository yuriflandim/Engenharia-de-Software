package br.edu.fjn.ir.model;

import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.OneToOne;
import javax.persistence.SequenceGenerator;

import br.edu.fjn.ir.model.Address;

@Entity
public class Business {

	@Id
	@GeneratedValue(strategy = GenerationType.SEQUENCE, generator = "business_seq")
	@SequenceGenerator(allocationSize = 1, initialValue = 1, name = "business_seq", sequenceName = "business_seq")
	private Integer id;
	private String name;
	private String CNPJ;
	private String stateRegistration;
	private String phone;
	@OneToOne(fetch = FetchType.EAGER)
	@JoinColumn(name = "idAddress", nullable = false)
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

	public String getCNPJ() {
		return CNPJ;
	}

	public void setCNPJ(String cNPJ) {
		CNPJ = cNPJ;
	}

	public String getStateRegistration() {
		return stateRegistration;
	}

	public void setStateRegistration(String stateRegistration) {
		this.stateRegistration = stateRegistration;
	}

	public String getPhone() {
		return phone;
	}

	public void setPhone(String phone) {
		this.phone = phone;
	}

	public Address getAddress() {
		return address;
	}

	public void setAddress(Address address) {
		this.address = address;
	}

}
