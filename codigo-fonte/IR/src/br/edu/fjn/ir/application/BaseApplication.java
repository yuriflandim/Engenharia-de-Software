package br.edu.fjn.ir.application;

import br.edu.fjn.ir.model.Base;
import br.edu.fjn.ir.model.repository.BaseRepository;

public class BaseApplication {

	private BaseRepository baseRepository = new BaseRepository();

	public void newBase(Base base) {
		try {
			baseRepository.insert(base);
		} catch (Exception e) {

		}

	}
}
