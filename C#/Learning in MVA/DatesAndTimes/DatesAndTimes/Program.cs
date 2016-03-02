using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DatesAndTimes
{
    class Program
    {
        static void Main(string[] args)
        {
            DateTime myValue = DateTime.Now;
            Console.WriteLine(myValue.ToString());
            Console.WriteLine();

            Console.WriteLine(myValue.ToShortDateString());
            Console.WriteLine(myValue.ToShortTimeString());
            Console.WriteLine();

            Console.WriteLine(myValue.ToUniversalTime());//GMT
            Console.WriteLine();

            Console.WriteLine(myValue.ToLongDateString());
            Console.WriteLine(myValue.ToLongTimeString());
            Console.WriteLine();

            Console.WriteLine(myValue.AddDays(3).ToLongDateString());
            Console.WriteLine(myValue.AddDays(-3).ToShortDateString());
            Console.WriteLine(myValue.AddHours(3).ToShortTimeString());
            Console.WriteLine(myValue.Month.ToString());
            Console.WriteLine();
            /*
            DateTime myBirthday = new DateTime(1990, 12, 25);
            Console.WriteLine(myBirthday.ToShortDateString());
            */
            DateTime myBirthday = DateTime.Parse("1990/12/25");
            TimeSpan myAge = DateTime.Now.Subtract(myBirthday);
            Console.WriteLine(myAge.TotalDays);

            Console.ReadLine();
        }
    }
}
