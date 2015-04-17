package br.edu.fjn.ir.application;

import br.edu.fjn.ir.model.Operador;
import br.edu.fjn.ir.model.repository.OperadorRepository;

public class OperadorApplication {

	private OperadorRepository operadorRepository = new OperadorRepository();

	public void novoOperador(Operador operador) {
		System.out.println("2");
		try {
			operadorRepository.insert(operador);
			System.out.println("cadastrado com sucesso");
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

}
