using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Distinct
{
    class Program
    {
        static void Main(string[] args)
        {
            List<int> number = new List<int> { 1, 5, 2, 2, 3 };
            number.Sort((x, y) => x.CompareTo(y));
            IEnumerable<int> distinctNum = number.Distinct();
            
            foreach (int n in distinctNum)
            {
                Console.Write(n+" ");
               
            }
             Console.ReadLine();
        }
    }
}
