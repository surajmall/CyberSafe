
# coding: utf-8

# In[101]:


import pandas as pd
import numpy as np


# In[161]:


#data = pd.read_csv('addiction1.csv')
data = pd.read_csv('anxiety1.csv')
#data2 = pd.read_csv('autism1.csv')
#data3 = pd.read_csv('bipolar1.csv')
#data4 = pd.read_csv('bpd1.csv')
data5 = pd.read_csv('depression1.csv')
data6 = pd.read_csv('selfharm1.csv')
data7 = pd.read_csv('suicide1.csv')
data8 = pd.read_csv('askreddit1_1.csv')
data9 = pd.read_csv('buildape1.csv')


# In[166]:


data=data.append(data9)


# In[167]:


X = data['text']
y = data['label']
X.head(5)
from sklearn.cross_validation import train_test_split
X.shape


# In[168]:


X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)


# In[169]:


from sklearn.pipeline import Pipeline
from sklearn.naive_bayes import MultinomialNB


# In[170]:


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


# In[171]:


predicted_mnb_stemmed = text_mnb_stemmed.predict(X_test)

np.mean(predicted_mnb_stemmed == y_test)


# In[196]:


check = ['I need a knife']


# In[197]:


pred2=text_mnb_stemmed.predict(check)


# In[198]:


pred2

