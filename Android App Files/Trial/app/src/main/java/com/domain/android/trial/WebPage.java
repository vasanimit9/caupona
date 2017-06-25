package com.domain.android.trial;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.EditText;

public class WebPage extends AppCompatActivity {

    EditText pwd = (EditText) findViewById(R.id.password);

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_web_page);

//        WebView webView;
//        webView = (WebView) findViewById(R.id.webview);
//        webView.getSettings().setJavaScriptEnabled(true);
//        webView.getSettings().setLoadWithOverviewMode(true);
//        webView.setWebViewClient(new WebViewClient());
//        webView.getSettings().setUseWideViewPort(true);
//        Bundle extras = getIntent().getExtras();
//        webView.loadUrl(extras.getString("password"));
    }

    public void onclick(View view) {
        Bundle extras = getIntent().getExtras();
        String str = extras.getString("password");
        String url = extras.getString("url");


        if (pwd.getText().toString() == str) {
            Bundle extra = new Bundle();
            extra.putString("url", url);
            Intent intent = new Intent(WebPage.this, MainWebPage.class);
            intent.putExtras(extra);
            startActivity(intent);
        } else {
            Intent intent = new Intent(WebPage.this, MainActivity.class);
            startActivity(intent);
        }
    }

}
