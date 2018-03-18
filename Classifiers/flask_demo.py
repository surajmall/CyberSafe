import numpy as np
import json
from flask import Flask, abort, jsonify,request
from sklearn.externals import joblib
import pandas as pd

file1='finalized_model2.sav'
mymodel=joblib.load(file1)
import tweepy
consumer_key="IuvQVQtyw19QGgptzXF11rugU"
consumer_secret="nudoo0gwoBEvaBFL6PDoHDaN68HtvrVj6zDFj6JW7DCuK60UJJ"
access_key="970690102471962626-Z487geOPo6X5eZqvtlYBNYrpgreoG9A"
access_secret="4PgSLex6DnySYzcUBdqm5hKW4I6JcdjjsnM4ZOQTN0XYP"
#print(mymodel)
app=Flask(__name__)

@app.route('/api',methods=['POST'])

def make_predict():
    data=request.get_json(force=True)
    predict_request=[data['username']]
    #print(predict_request[0])
    auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
    auth.set_access_token(access_key, access_secret)
    api = tweepy.API(auth)
    number_of_tweets=200
    tweets = api.user_timeline(screen_name=predict_request[0])
    tweets_for_csv = [tweet.text for tweet in tweets] # CSV file created
    predict_request=np.array(tweets_for_csv)
    pred_1=mymodel.predict(tweets_for_csv)
    print(pred_1)
    output=pred_1.tolist()
    print(type(output))
    #output.tolist
    #pd.Series(output).to_json(orient='values')
    #output=tweets_for_csv
    return jsonify(result=output,tweets=tweets_for_csv)

if __name__=='__main__':
    app.run(port=9000,debug=True)
