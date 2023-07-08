from flask import Flask,render_template,request,redirect
import mysql.connector

app=Flask(__name__,template_folder='templates')
ALLOWED_EXTENSIONS = set(['png', 'jpg', 'jpeg', 'gif'])

conn=mysql.connector.connect(host='localhost',user='root',password="",database="test")
cursor=conn.cursor()

@app.route('/')
def login():
    return render_template('login.html')

@app.route('/register')
def register():
    return render_template('registration.html')

@app.route('/home')
def home():
    return render_template('index.html')

@app.route('/about')
def about():
    return render_template('about.html')

@app.route('/book')
def book():
    return render_template('book.html')

@app.route('/contact')
def contact():
    return render_template('contact.html')

@app.route('/services')
def services():
    return render_template('services.html')

@app.route('/view')
def view():
    return render_template('vu.html')

@app.route('/logout')
def logout():
    return redirect('/')


@app.route('/login_validation', methods=['POST'])
def login_validation():
    email=request.form.get('email')
    password=request.form.get('password')

    cursor.execute("""SELECT * FROM register WHERE email LIKE '{}' AND password LIKE '{}' """.format(email,password))
    users=cursor.fetchall()
    if len(users)>0:
        return redirect('/home')
    else:
        return redirect('/')

@app.route('/add_user', methods=['POST'])
def add_user():
    name=request.form.get('uname')
    userid=request.form.get('uuserid')
    email=request.form.get('uemail')
    password=request.form.get('upassword')

    cursor.execute("""INSERT INTO register (name,user_id,email,password) VALUES('{}','{}','{}','{}')""".format(name,userid,email,password))
    conn.commit()
    return "User Registered successfully"


@app.route('/success', methods=['POST'])
def success():
    
    userid=request.form.get('uname')
    name=request.form.get('name')
    service=request.form.get('people')
    time=request.form.get('time')
    date=request.form.get('date')
    contact=request.form.get('number')

    cursor.execute("""INSERT INTO booking (user_id,pet_name,service,time,date,contact) VALUES('{}','{}','{}','{}','{}','{}')""".format(userid,name,service,time,date,contact))
    conn.commit()
    return "Booking Done successfully"

if __name__=="__main__":
    app.run(debug=True)

@app.route('/booking', methods=['POST'])
def booking():
    return "booking done"
    cursor.execute("""SELECT * FROM booking WHERE user_id = 'nags_56'""")
    conn.commit()
    if len(booking)>0:
        return redirect('/booking')
    else:
        return redirect('/book')
    
