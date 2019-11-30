package ui;

import java.awt.BorderLayout;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.TitledBorder;

public class MyWindow extends JFrame {
	private JPanel contentPane;
	private JButton topButton;
	private JButton bottomButton;
	private JPanel pnlGround;
	private JButton[][] buttons;

	// Model - Data
	private MyData data;

	public MyWindow() {
		data = new MyData();
		initFrame();
		initComponents();
		initButtons();

	}

	private void initButtons() {
		ActionListener ac = new GroundButtonClickListener();
		buttons = new JButton[data.getRows()][data.getCols()];
		for (int i = 0; i < data.getRows(); i++) {
			for (int j = 0; j < data.getCols(); j++) {
				// buttons[i][j] <= data.getNumber(i, j)
				buttons[i][j] = new JButton();
				buttons[i][j].setText(String.valueOf(data.getNumber(i, j)));
				buttons[i][j].addActionListener(ac);
				pnlGround.add(buttons[i][j]);
			}
		}
	}

	private void initComponents() {
		contentPane = new JPanel();
		topButton = new JButton("+1");
		ActionListener ac = new ChangeButtonClickListener();
		topButton.addActionListener(ac);
		bottomButton = new JButton("-1");
		bottomButton.addActionListener(ac);
		pnlGround = new JPanel();

		setContentPane(contentPane);
		contentPane.setLayout(new BorderLayout());
		contentPane.add(topButton, BorderLayout.PAGE_START);
		contentPane.add(bottomButton, BorderLayout.PAGE_END);

		pnlGround.setBorder(new TitledBorder("Ground"));
		pnlGround.setLayout(new GridLayout(data.getRows(), data.getCols()));
		contentPane.add(pnlGround, BorderLayout.CENTER);
	}

	private void initFrame() {
		setDefaultCloseOperation(EXIT_ON_CLOSE);
		setSize(400, 500);
		setTitle("Demo 1");
	}

	private void updateButtons() {
		for (int i = 0; i < buttons.length; i++) {
			for (int j = 0; j < buttons[i].length; j++) {
				buttons[i][j].setText(String.valueOf(data.getNumber(i, j)));
			}
		}
	}
	
	

	class ChangeButtonClickListener implements ActionListener {
		@Override
		public void actionPerformed(ActionEvent e) {
			//e -> đối tượng lưu thông tin sự kiện
			//e.getSource() -> đối tượng gây ra sự kiện
			JButton aButton = (JButton) e.getSource();
			//if...else... hoặc xử lý chuyển đổi String -> int
			int k = Integer.parseInt(aButton.getText());
			// Tang 1 cho numbers
			data.changeAllNumbers(k);
			// buttons <= numbers
			updateButtons();
		}
	}
	
	class GroundButtonClickListener implements ActionListener{

		@Override
		public void actionPerformed(ActionEvent e) {
			// TODO Auto-generated method stub
			//tìm i,j: buttons[i][j] được click
			int row = -1, col = -1;
			JButton aButton = (JButton) e.getSource();
			int z = pnlGround.getComponentZOrder(aButton);
			row = z/data.getCols();
			col = z%data.getCols();
			
			//tăng data.getNumber(i, j)
			data.changeOneNumber(row, col);
			//
			//buttons <= numbers
			updateButtons();
		}
		
	}
}
