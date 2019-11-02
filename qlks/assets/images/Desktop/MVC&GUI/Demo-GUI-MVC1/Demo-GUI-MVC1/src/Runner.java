
public class Runner {
	public static void main(String[] args) {
		MyView view = new MyView();
		MyModel model = new MyModel();
		MyController controller = new MyController(model, view);
		
		view.setVisible(true);
	}
}
