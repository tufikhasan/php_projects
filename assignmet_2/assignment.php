#! /usr/bin/env php
<?php
while ( true ) {
    echo <<<EOD
\n---------------------------------------
What do you want to do?
    1. Add income
    2. Add expense
    3. View incomes
    4. View expenses
    5. View savings
    6. View categories
    7. Exit
    \n
EOD;
    $option = (int) readline( 'Enter your option:' );

    if ( 1 == $option ) {
        $categories = json_decode( file_get_contents( 'categories.csv' ), true );
        echo "\nIncome Categories\n";
        foreach ( $categories['income_category'] as $key => $value ) {
            echo "=> $value\n";
        }
        $cat_name = readline( 'Enter Category Name:' );
        $amount = (int) readline( 'Enter Value: ' );

        $income_data = json_decode( file_get_contents( 'income.csv' ), true );
        if ( array_key_exists( $cat_name, $income_data ) ) {
            $income_data[$cat_name] += $amount;
            file_put_contents( 'income.csv', json_encode( $income_data ), LOCK_EX );
            echo "Income $amount taka Successfully Added into $cat_name Category";
        } else {
            echo "$cat_name: Is not exists in income category";
        }

    } elseif ( 2 == $option ) {
        $categories = json_decode( file_get_contents( 'categories.csv' ), true );
        echo "\nExpense Categories\n";
        foreach ( $categories['expense_category'] as $key => $value ) {
            echo "=> $value\n";
        }
        $ex_cat = readline( 'Enter Category Name:' );
        $amount = (int) readline( 'Enter Value: ' );

        $expense_data = json_decode( file_get_contents( 'expense.csv' ), true );
        if ( array_key_exists( $ex_cat, $expense_data ) ) {
            $expense_data[$ex_cat] += $amount;
            file_put_contents( 'expense.csv', json_encode( $expense_data ), LOCK_EX );
            echo "Expense $amount taka Successfully Added into $ex_cat Category";
        } else {
            echo "$ex_cat: Is not exists in expense category";
        }
    } elseif ( 3 == $option ) {
        $incomes = json_decode( file_get_contents( 'income.csv' ), true );
        echo "\nIncome Lists\n";
        $i = 1;
        foreach ( $incomes as $key => $value ) {
            echo ( $i++ ) . ": $key = $incomes[$key] \n";
        }
    } elseif ( 4 == $option ) {
        $expenses = json_decode( file_get_contents( 'expense.csv' ), true );
        echo "\nExpense Lists\n";
        $i = 1;
        foreach ( $expenses as $key => $value ) {
            echo ( $i++ ) . ": $key = $expenses[$key] \n";
        }
    } elseif ( 5 == $option ) {
        $incomes = json_decode( file_get_contents( 'income.csv' ), true );
        $income_sum = 0;
        foreach ( $incomes as $key => $value ) {
            $income_sum += $incomes[$key];
        }
        $expenses = json_decode( file_get_contents( 'expense.csv' ), true );

        $expense_sum = 0;
        foreach ( $expenses as $key => $value ) {
            $expense_sum += $expenses[$key];
        }
        echo "\n------- Saving (income - expense) ---------\n";
        echo "Total Income  = $income_sum\n";
        echo "Total Expense = $expense_sum\n";
        echo "--------------------------\n";
        echo "Saving        = " . ( $income_sum - $expense_sum );
    } elseif ( 6 == $option ) {
        $data = json_decode( file_get_contents( 'categories.csv' ), true );
        echo "\nIncome Categories\n";
        foreach ( $data['income_category'] as $key => $value ) {
            echo ( $key + 1 ) . ": $value\n";
        }
        echo "\nExpense Categories\n";
        foreach ( $data['expense_category'] as $key => $value ) {
            echo ( $key + 1 ) . ": $value\n";
        }

    } elseif ( 7 == $option ) {
        break;
    } else {
        echo "\nPlease Select A Correct Option";
    }
}