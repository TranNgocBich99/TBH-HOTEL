import java.awt.FlowLayout;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class MyView extends JFrame {
	private JPanel contentPane;
	private JTextField txtFirstNumber;
	private JTextField txtSecondNumber;
	private JTextField txtResult;
	private JLabel lblAdd;
	private JButton btnCalculate;
	
	public MyView() {
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setSize(600,300);
		setTitle("Simple Calculator");
		
		contentPane = new JPanel();
		contentPane.setLayout(new FlowLayout());
		setContentPane(contentPane);
		
		txtFirstNumber = new JTextField(10);
		contentPane.add(txtFirstNumber);
		
		lblAdd = new JLabel("+");
		contentPane.add(lblAdd);
		
		txtSecondNumber = new JTextField(10);
		contentPane.add(txtSecondNumber);
		
		btnCalculate = new JButton("=");
		contentPane.add(btnCalculate);
		
		txtResult = new JTextField(10);
		contentPane.add(txtResult);
		
		
	}
	
	public void addActionListenerForButton(ActionListener ac) {
		btnCalculate.addActionListener(ac);
	}
	
	public int getFirstNumber() {
		return Integer.parseInt(txtFirstNumber.getText().trim());
	}
	
	public int getSecondNumber() {
		return Integer.parseInt(txtSecondNumber.getText().trim());
	}
	
	public void setResult(int result) {
		txtResult.setText(String.valueOf(result));
	}
}
