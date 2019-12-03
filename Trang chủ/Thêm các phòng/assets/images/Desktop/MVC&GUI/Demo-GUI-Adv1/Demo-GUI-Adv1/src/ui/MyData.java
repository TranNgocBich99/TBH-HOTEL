package ui;

public class MyData {
	private int[][] numbers = { { 1, 0, 1, 2, 3 }, { 1, 0, 1, 2, 3 }, { 1, 0, 1, 2, 3 }, { 1, 0, 1, 2, 3 },
			{ 1, 0, 1, 2, 3 } };

	public int[][] getNumbers() {
		return numbers;
	}

	public void changeAllNumbers(int k) {
		for (int i = 0; i < numbers.length; i++) {
			for (int j = 0; j < numbers[i].length; j++) {
				numbers[i][j] = numbers[i][j] + k;
			}
		}
	}

	public void changeOneNumber(int row, int col) {
		// TODO Auto-generated method stub
		numbers[row][col]++;
	}
	
	public int getRows() {
		return numbers.length;
	}
	
	public int getCols() {
		return numbers[0].length;
	}
	
	public int getNumber(int i, int j) {
		return numbers[i][j];
	}
}
