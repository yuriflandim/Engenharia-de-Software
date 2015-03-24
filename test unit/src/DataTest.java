import static org.junit.Assert.*;

import org.junit.Before;
import org.junit.Test;

public class DataTest {
	Data data;

	@Before
	public void setUp() throws Exception {
		data = new Data();
	}

	@Test
	public void test() {
		assertEquals("07/03/2015", data.formataData("2015/03/07"));
	}

}
