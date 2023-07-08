from flask import Flask,redirect

app=Flask(__name__)

@app.route('/')
def home():
    return redirect('index.html')

@app.route('/about')
def about():
    return 'about page'

if __name__=="__main__":
    app.run(debug=True)





    
