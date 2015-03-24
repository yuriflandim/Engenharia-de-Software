
public class Data {
	
	public String formataData(String data){
		
		String dia, mes, ano;
		ano = data.substring(0, 4);
		mes = data.substring(5, 7);
		dia = data.substring(8,10);
		
		return dia+"/"+mes+"/"+ano;
	}
}
