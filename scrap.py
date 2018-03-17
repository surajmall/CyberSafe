import tweepy
 
# Fill the X's with the credentials obtained by 
# following the above mentioned procedure.

consumer_key="IuvQVQtyw19QGgptzXF11rugU"
consumer_secret="nudoo0gwoBEvaBFL6PDoHDaN68HtvrVj6zDFj6JW7DCuK60UJJ"
access_key="970690102471962626-Z487geOPo6X5eZqvtlYBNYrpgreoG9A"
access_secret="4PgSLex6DnySYzcUBdqm5hKW4I6JcdjjsnM4ZOQTN0XYP"
 
# Function to extract tweets
def get_tweets(username):
         
        # Authorization to consumer key and consumer secret
        auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
 
        # Access to user's access key and access secret
        auth.set_access_token(access_key, access_secret)
 
        # Calling api
        api = tweepy.API(auth)
 
        # 200 tweets to be extracted
        number_of_tweets=1000
        tweets = api.user_timeline(screen_name=username)
 
        # Empty Array
        tmp=[] 
 
        # create array of tweet information: username, 
        # tweet id, date/time, text
        tweets_for_csv = [tweet.text for tweet in tweets] # CSV file created 
        for j in tweets_for_csv:
 
            # Appending tweets to the empty array tmp
            tmp.append(j) 
 
        # Printing the tweets
        print(tmp)
 
def input_username(uname):
	get_tweets(uname)
'''# Driver code
if __name__ == '__main__':
 
    # Here goes the twitter handle for the user
    # whose tweets are to be extracted.
    get_tweets("Trump")
    
'''
