package com.domain.android.trial;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainWebPage extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_web_page);

        WebView webView = (WebView)findViewById(R.id.main_web_page);

        webView.getSettings().setJavaScriptEnabled(true);
        webView.getSettings().setLoadWithOverviewMode(true);
        webView.setWebViewClient(new WebViewClient());
        webView.getSettings().setUseWideViewPort(true);
        Bundle extras = getIntent().getExtras();
        webView.loadUrl(extras.getString("url") + "&app=1");

    }
}
