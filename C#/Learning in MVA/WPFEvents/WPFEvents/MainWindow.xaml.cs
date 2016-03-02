using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace WPFEvents
{
    /// <summary>
    /// MainWindow.xaml 的互動邏輯
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();

            MyButton.Click += MyButton_Click;
            MyButton.Click += MyButton_IClickThis;
        }

        private void MyButton_IClickThis(object sender, RoutedEventArgs e)
        {
            //throw new NotImplementedException();
            MyLabel.Content = "Hello World Again!";
        }

        void MyButton_Click(object sender, RoutedEventArgs e)
        {
            //throw new NotImplementedException();
            MyLabel.Content = "Hello World!";
        }
    }
}
