using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Smcg_database
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _id;
        protected string _fullname;
        protected string _username;
        protected string _email;
        protected string _password;
        protected string _role;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string fullname, string username, string email, string password, string role)
        {
            this._fullname=fullname;
            this._username=username;
            this._email=email;
            this._password=password;
            this._role=role;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Fullname
        {
            get {return _fullname;}
            set {_fullname=value;}
        }
        public virtual string Username
        {
            get {return _username;}
            set {_username=value;}
        }
        public virtual string Email
        {
            get {return _email;}
            set {_email=value;}
        }
        public virtual string Password
        {
            get {return _password;}
            set {_password=value;}
        }
        public virtual string Role
        {
            get {return _role;}
            set {_role=value;}
        }
        #endregion
    }
    #endregion
}