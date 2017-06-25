package com.domain.android.caupona;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class HomeActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
    }

    public void SecondPage(View view)
    {
//        Bundle extras = getIntent().getExtras();
        Intent i = new Intent(HomeActivity.this,SecondPage.class);
//        getIntent().putExtras(extras);
        startActivity(i);
    }
}
