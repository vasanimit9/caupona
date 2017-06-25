package com.domain.android.caupona;

        import com.google.zxing.Result;
        import android.app.Activity;
        import android.content.DialogInterface;
        import android.content.Intent;
        import android.database.CursorJoiner;
        import android.os.Bundle;
        import android.support.annotation.Nullable;
        import android.support.v7.app.AlertDialog;
        import android.support.v7.app.AppCompatActivity;
        import android.util.Log;
        import android.view.View;
        import android.webkit.WebView;
        import android.widget.TextView;
        import com.google.zxing.Result;
        import me.dm7.barcodescanner.zxing.ZXingScannerView;
        import android.app.Activity;
        import android.os.Bundle;
        import android.widget.Toast;



public class SecondPage extends Activity implements ZXingScannerView.ResultHandler{

    String str;
    private ZXingScannerView mScannerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second_page);

    }


    public void onclick(View view) {
        mScannerView = new ZXingScannerView(this);
        setContentView(mScannerView);
        mScannerView.setResultHandler(this);
        mScannerView.startCamera();

    }


    @Override
    public void onPause()
    {
        super.onPause();
        mScannerView.stopCamera();
    }

    @Override
    public void handleResult(Result result)
    {

        Bundle extras = new Bundle();
        extras.putString("url",result.getText()+ "heythere@gmail.com");
        Intent intent =new Intent(SecondPage.this,WebPage.class);
        intent.putExtras(extras);
        startActivity(intent);
//        AlertDialog.Builder builder = new AlertDialog.Builder(this);
//        builder.setTitle("Scan Result");
//        builder.setMessage(result.getText());
//        builder.setPositiveButton("Yes",new DialogInterface.OnClickListener() {
//          public void onClick(DialogInterface dialog, int id) {
//                Intent i = new Intent(SecondPage.this, WebPage.class);
//                startActivity(i);
//                }
//        });
//        builder.show();
    }

//    private void openWebPage() {
//        Intent i = new Intent(SecondPage.this, WebPage.class);
//        startActivity(i);
//    }

}