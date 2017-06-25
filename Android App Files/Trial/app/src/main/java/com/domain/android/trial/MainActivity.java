package com.domain.android.trial;

import android.app.Activity;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

import com.google.zxing.Result;
import com.google.zxing.common.StringUtils;

import me.dm7.barcodescanner.zxing.ZXingScannerView;

public class MainActivity extends Activity implements ZXingScannerView.ResultHandler{

    private ZXingScannerView mScannerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mScannerView = new ZXingScannerView(this);
        setContentView(mScannerView);
        mScannerView.setResultHandler(this);
        mScannerView.startCamera();

    }


//    public void onclick(View view) {
//        mScannerView = new ZXingScannerView(this);
//        setContentView(mScannerView);
//        mScannerView.setResultHandler(this);
//        mScannerView.startCamera();
//
//    }


    @Override
    public void onPause()
    {
        super.onPause();
        mScannerView.stopCamera();
    }

    @Override
    public void handleResult(Result result) {

        Bundle extras = new Bundle();
        String str = result.getText();
        String[] res = str.split(" ");
        String url = res[0];
        String pwd = res[1];
//        AlertDialog.Builder builder = new AlertDialog.Builder(this);
//        builder.setTitle("url");
//        builder.setMessage(url);
//        builder.show();

        extras.putString("url", url);
        extras.putString("password", pwd);
        Intent intent = new Intent(MainActivity.this, MainWebPage.class);
        intent.putExtras(extras);
        startActivity(intent);
    }

//    public static String customized(String str)
//    {
//        String result;
//        int i,j;
//
//        return result;
//    }
}
