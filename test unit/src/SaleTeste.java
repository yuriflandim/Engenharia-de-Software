import static org.junit.Assert.*;

import org.junit.Before;
import org.junit.Test;

public class SaleTeste {

	Sale sale;

	@Before
	public void setUp() throws Exception {
		sale = new Sale();
	}

	@Test
	public void testValueSale() {
		assertEquals(6, sale.valueSale(3, 2));
	}

}
