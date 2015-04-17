package br.edu.fjn.ir.connection;

import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

public class Connection {
	private static EntityManagerFactory connection;

	private Connection() {

	}

	public static EntityManager getConnection() {

		if (connection == null) {
			connection = Persistence.createEntityManagerFactory("unitJPA");
		}
		return connection.createEntityManager();

	}

}