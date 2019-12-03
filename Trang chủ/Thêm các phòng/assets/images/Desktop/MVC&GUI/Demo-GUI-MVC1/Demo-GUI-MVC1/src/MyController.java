import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class MyController {
	private MyView view;
	private MyModel model;
	
	public MyController(MyModel model, MyView view) {
		this.model = model;
		this.view = view;
		
		//gắn ac lên view
		ActionListener ac = new MyActionListener();
		view.addActionListenerForButton(ac);
	}
	

	class MyActionListener implements ActionListener{

		@Override
		public void actionPerformed(ActionEvent e) {
			// TODO Auto-generated method stub
			//Lấy 2 số trên 2 ô text trên view
			int firstNumber = view.getFirstNumber();
			int secondNumber = view.getSecondNumber();
			//Goi model xử lý 2 số này
			int sum = model.getSum(firstNumber, secondNumber);
			//Hiển thị lại lên view
			view.setResult(sum);
		}
		
	}
}
