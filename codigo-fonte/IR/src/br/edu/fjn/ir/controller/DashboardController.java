package br.edu.fjn.ir.controller;

import br.com.caelum.vraptor.Get;
import br.com.caelum.vraptor.Resource;
import br.com.caelum.vraptor.Result;
import br.edu.fjn.ir.application.BaseApplication;

@Resource
public class DashboardController {

	private Result result;
	private BaseApplication baseApplication;

	public DashboardController(Result result) {
		super();
		this.result = result;
		baseApplication = new BaseApplication();
	}

	@Get("dashboard")
	public void dashboard() {
		
	}

}
