package br.edu.fjn.ir.model.repository.interfaces;

import java.lang.reflect.ParameterizedType;
import java.util.List;

import javax.persistence.EntityManager;

import org.hibernate.Criteria;
import org.hibernate.Session;
import org.hibernate.criterion.Criterion;
import org.hibernate.criterion.MatchMode;
import org.hibernate.criterion.Restrictions;

import br.edu.fjn.ir.connection.Connection;

public interface Persisting<Tipo> {

	default void insert(Tipo object) {
		EntityManager entityManager = Connection.getConnection();
		entityManager.getTransaction().begin();
		try {
			entityManager.persist(object);
			entityManager.getTransaction().commit();
		} catch (Exception e) {
			entityManager.getTransaction().rollback();
			e.printStackTrace();
			e.getMessage();
		} finally {
			entityManager.close();
		}
	}

	default void merge(Tipo object) {
		EntityManager entityManager = Connection.getConnection();
		entityManager.getTransaction().begin();
		try {
			entityManager.merge(object);
			entityManager.getTransaction().commit();
		} catch (Exception e) {
			entityManager.getTransaction().rollback();
			e.printStackTrace();
			e.getMessage();
		} finally {
			entityManager.close();
		}

	}

	default Tipo findByID(Integer id) {
		EntityManager entityManager = Connection.getConnection();
		entityManager.getTransaction().begin();
		Tipo resultado = null;
		try {
			resultado = (Tipo) entityManager.find(getTypeClass(), id);
			entityManager.getTransaction().commit();
		} catch (Exception e) {
			entityManager.getTransaction().rollback();
			e.printStackTrace();
			e.getMessage();
		} finally {
			entityManager.close();
		}
		return resultado;

	}

	default void clear(Tipo object) {
		EntityManager entityManager = Connection.getConnection();
		entityManager.getTransaction().begin();
		try {
			object = entityManager.merge(object);
			entityManager.remove(object);
			entityManager.getTransaction().commit();
		} catch (Exception e) {
			entityManager.getTransaction().rollback();
		} finally {
			entityManager.close();
		}
	}

	@SuppressWarnings("unchecked")
	default Tipo findByName(String nome) {

		EntityManager entityManager = Connection.getConnection();

		Session session = (Session) entityManager.getDelegate();

		Criteria criteria = session.createCriteria(getTypeClass());

		Criterion c1 = Restrictions.ilike("name", nome, MatchMode.ANYWHERE);

		criteria.add(c1);

		criteria.setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY);

		return (Tipo) criteria.uniqueResult();
	}

	default List<Tipo> listByName(String nome) {

		EntityManager entityManager = Connection.getConnection();

		Session session = (Session) entityManager.getDelegate();

		Criteria criteria = session.createCriteria(getTypeClass());

		Criterion c1 = Restrictions.ilike("name", nome, MatchMode.ANYWHERE);

		criteria.add(c1);

		criteria.setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY);

		return (List<Tipo>) criteria.list();
	}

	@SuppressWarnings("unchecked")
	default List<Tipo> listAll() {
		EntityManager manager = Connection.getConnection();

		Session session = (Session) manager.getDelegate();

		Criteria criteria = session.createCriteria(getTypeClass());

		criteria.setResultTransformer(Criteria.DISTINCT_ROOT_ENTITY);

		return (List<Tipo>) criteria.list();
	}

	default Class<?> getTypeClass() {
		Class<?> classe = (Class<?>) ((ParameterizedType) this.getClass()
				.getGenericSuperclass()).getActualTypeArguments()[0];

		return classe;
	}

}
