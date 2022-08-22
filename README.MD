Clone project: git clone https://github.com/alexa9795/fileParser.git

Instal dependencies: composer install

Start a local symfony session: symfony:session:start

Access http://localhost:8000/. This will render a form for uploading the text file for parsing. 

In order to be able to return requiered output some processing has to be done. We need to do some natural language processing (NLP) in our application and recognize each sentence. There is something call OpenNLP, it's a JAVA-based NLP parser tool. Or Stanford NLP parser in Ruby.
In this case, regex expression are used in order to split text into sentences.

When pressing "Send" a redirect to http://localhost:8000/parse is made and parsed content is returned.

