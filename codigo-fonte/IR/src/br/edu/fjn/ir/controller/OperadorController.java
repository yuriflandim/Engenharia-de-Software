package br.edu.fjn.ir.controller;

import br.com.caelum.vraptor.Get;
import br.com.caelum.vraptor.Path;
import br.com.caelum.vraptor.Post;
import br.com.caelum.vraptor.Resource;
import br.com.caelum.vraptor.Result;
import br.edu.fjn.ir.model.Operador;
import br.edu.fjn.ir.model.repository.OperadorRepository;

@Resource
public class OperadorController {

	private Result result;
	private OperadorRepository operadorRepository;

	public OperadorController(Result result) {
		super();
		this.result = result;
		operadorRepository = new OperadorRepository();
	}

	@Get("operador")
	public void novo() {

	}

	@Post("cadastrar")
	public void cadastrar(Operador operador) {
		try {
			operadorRepository.insert(operador);
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}
