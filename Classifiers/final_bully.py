
# coding: utf-8

# In[1]:


import pandas as pd
import numpy as np


# In[82]:


data = pd.read_csv('new_data.csv')
data1= pd.read_csv('badwords.csv')


# In[83]:


data


# In[114]:


X = data['tweet']
y = data['label']
from sklearn.cross_validation import train_test_split


# In[115]:


X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)


# In[116]:


from sklearn.pipeline import Pipeline
from sklearn.naive_bayes import MultinomialNB


# In[117]:


from nltk.stem.snowball import SnowballStemmer
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.feature_extraction.text import TfidfTransformer
stemmer = SnowballStemmer("english", ignore_stopwords=True)

class StemmedCountVectorizer(CountVectorizer):
    def build_analyzer(self):
        analyzer = super(StemmedCountVectorizer, self).build_analyzer()
        return lambda data: ([stemmer.stem(w) for w in analyzer(data)])

stemmed_count_vect = StemmedCountVectorizer(stop_words='english')

text_mnb_stemmed = Pipeline([('vect', stemmed_count_vect),('tfidf', TfidfTransformer()),('mnb', MultinomialNB(fit_prior=False)),])

text_mnb_stemmed = text_mnb_stemmed.fit(X_train, y_train)


# In[123]:


predicted_mnb_stemmed = text_mnb_stemmed.predict(X_test)

np.mean(predicted_mnb_stemmed == y_test)


# In[137]:


check= ['hey how are you','you are ugly','shivam is great','i will kill you','i will fuck you bastard','bastard']
type(check)


# In[138]:


predicted_mnb_stemmed1 = text_mnb_stemmed.predict(check)


# In[139]:


predicted_mnb_stemmed1

