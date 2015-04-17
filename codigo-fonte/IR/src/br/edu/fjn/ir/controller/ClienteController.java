package br.edu.fjn.ir.controller;

import br.com.caelum.vraptor.Get;
import br.com.caelum.vraptor.Path;
import br.com.caelum.vraptor.Resource;
import br.com.caelum.vraptor.Result;
import br.edu.fjn.ir.model.repository.ClientRepository;

@Resource
public class ClienteController {

	private Result result;
	private ClientRepository clienteRepository;

	public ClienteController(Result result) {
		super();
		this.result = result;
		clienteRepository = new ClientRepository();
	}

	@Get("cliente")
	public void novo() {
		
	}
}
