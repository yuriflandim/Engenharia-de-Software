package br.edu.fjn.ir.controller;

import java.util.List;

import br.com.caelum.vraptor.Get;
import br.com.caelum.vraptor.Post;
import br.com.caelum.vraptor.Resource;
import br.com.caelum.vraptor.Result;
import br.edu.fjn.ir.model.Base;
import br.edu.fjn.ir.model.repository.BaseRepository;

@Resource
public class BaseController {

	private Result result;
	private BaseRepository baseRepository;

	public BaseController(Result result) {
		super();
		this.result = result;
		baseRepository = new BaseRepository();
	}

	@Get("base")
	public void nova() {

	}

	@Post("base/cadastrar")
	public void cadastrar(Base base) {
		try {
			baseRepository.insert(base);
			result.redirectTo(this).listar();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
	
	@Get("baselistar")
	public void listar() {
//		List<Base> bases = baseRepository.listAll();
//		result.include("bases", bases);
	}
}
